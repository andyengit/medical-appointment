const getAdresses = function() {
    let oReq = new XMLHttpRequest();

    oReq.onload = function() {
        let response = JSON.parse(this.responseText);

        let states = response.map(el => el[0]);
        states = states.filter((v, i, a) => a.indexOf(v) === i);

        const stateSelect = document.getElementById("state");
        const citySelect = document.getElementById("city");

        for (const state of states) {
            const option = document.createElement("option");
            option.value = state;
            option.text = state;

            stateSelect.appendChild(option);
        }

        stateSelect.onchange = function() {
            const indx = stateSelect.selectedIndex;
            const selected = stateSelect.options[indx].value;

            while (citySelect.options.length > 0) {
                citySelect.remove(0);
            }

            for (const el of response) {
                if (selected === el[0]) {
                    const option = document.createElement("option");
                    option.value = el[2];
                    option.text = el[1];

                    citySelect.appendChild(option);
                }
            }
        }
    };

    oReq.open("get", "http://localhost/proyecto/address/index", true);
    oReq.send();
};

getAdresses();