// When the page is loaded
window.addEventListener("load", () => {
    let taxes = {
        710: 0,
        720: 1.8,
        740: 4.5,
        760: 5,
        822: 7.9,
        931: 10.1,
        1015: 11.3,
        1075: 12.1,
        1154: 13.1,
        1237: 14.1,
        1333: 15.2,
        1437: 16.2,
        1577: 17.2,
        1727: 18.6,
        1887: 19.9,
        1995: 20.9,
        2109: 21.9,
        2238: 22.8,
        2389: 23.8,
        2558: 24.8,
        2792: 25.8,
        3132: 27,
        3566: 28.6,
        4156: 29.7,
        4692: 31.4,
        5241: 32.3,
        5933: 33.3,
        6788: 35.3,
        8011: 36.3,
        9647: 38.2,
        11384: 39.2,
        19024: 40.2,
        20403: 41.2,
        22954: 41.9,
        25504: 42.9,
        25505: 43.8,
    };

    // Get User Input
    let type = document.getElementById("meal_allowance");
    let mealAmount = document.getElementById("meal_allowance_amount");

    // Checker if it has meal allowance or not
    type.addEventListener("change", () => {
        if (type.value === "no_allowance") {
            mealAmount.value = 0;
            mealAmount.disabled = true;
        } else {
            mealAmount.disabled = false;
        }
    });

    function getTaxRate(grossSalary, taxTable) {
        for (let salary in taxTable) {
            if (salary >= grossSalary) {
                return taxTable[salary];
            }
        }
        return 43.8;
    }

    function calcMealAmount(
        liquid,
        gross,
        type,
        mealAmount
    ) {
        if (type === "no_allowance") {
            return { netSalary: liquid, grossSalary: gross };
        } else if (type === "card") {
            // Case 7.33
            if (mealAmount >= 7.33) {
                gross = gross + (mealAmount - 7.33) * 22;
                liquid = liquid + 7.33 * 22;
            } else {
                liquid = liquid + mealAmount * 22;
            }
            // case 4.57
        } else if (type === "money") {
            if (mealAmount >= 4.57) {
                gross = gross + (mealAmount - 4.57) * 22;
                liquid = liquid + 4.57 * 22;
            } else {
                liquid = liquid + mealAmount * 22;
            }
        }
        return { liquid: liquid, gross: gross };
    }

    // Calculate Liquid
    function calcLiquid() {
        let liquidTemp = 0;
        let gross =+ document.getElementById("base_salary").value;
        let type = document.getElementById("meal_allowance").value;
        let mealAmount =+ document.getElementById("meal_allowance_amount").value;
        const result = calcMealAmount(
            liquidTemp,
            gross,
            type,
            mealAmount
        );

        liquidTemp = result.liquid;
        gross = result.gross;

        // Get Tax amount
        const taxOwed = getTaxRate(gross, taxes);

        const discount_ss = gross * (11 / 100);
        const discount_irs = gross * (taxOwed / 100);

        // Liquid with taxes applied
        const liquid = gross - discount_irs - discount_ss + liquidTemp;

        document.getElementById("liquid").textContent = liquid.toFixed(2);
        document.getElementById("discount_irs").textContent =
            discount_irs.toFixed(2);
        document.getElementById("discount_ss").textContent =
            discount_ss.toFixed(2);
        document.getElementById("gross").textContent =
            gross.toFixed(2);
        document.getElementById("taxes").textContent = taxOwed.toFixed(2) + "%";
    }

    function redirect() {
        location.replace("../pages/dashboard/dashboard.php");
    }

    const submitButton = document.getElementById("calculate");

    submitButton.addEventListener("click", calcLiquid);

    const redirectButton = document.getElementById("redirect");

    redirectButton.addEventListener("click", redirect)
});
