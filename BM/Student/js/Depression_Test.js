function selectOption(question, option) {
    // Remove the 'selected' class from all circles in the same question
    document.querySelectorAll(`#circle-${question}-option1, #circle-${question}-option2, #circle-${question}-option3, #circle-${question}-option4`).forEach(circle => {
        circle.classList.remove('selected');
    });

    // Add the 'selected' class to the clicked circle
    const circle = document.querySelector(`#circle-${question}-${option}`);
    circle.classList.add('selected');

    // Check the associated radio input
    const radioInput = document.querySelector(`#${question}-${option}`);
    radioInput.checked = true;
}

document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form:last-of-type");
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let total = 0;
        let answered = 0;

        for (let i = 1; i <= 20; i++) {
            const selected = document.querySelector(`input[name="question${i}"]:checked`);
            if (selected) {
                total += parseInt(selected.value);
                answered++;
            }
        }

        if (answered !== 20) {
            alert("Please answer all questions before submitting.");
            return;
        }

        let result = "";

        if (total <= 10) {
            result = "Normal ups and downs";
        } else if (total <= 16) {
            result = "Mild mood disturbance";
        } else if (total <= 20) {
            result = "Borderline clinical depression";
        } else if (total <= 30) {
            result = "Moderate depression";
        } else if (total <= 40) {
            result = "Severe depression";
        } else {
            result = "Extreme depression";
        }

        Swal.fire({
            title: 'Test Result',
            html: `<b>Total Score:</b> ${total}<br><b>Result:</b> ${result}`,
            icon: 'info',
            confirmButtonText: 'OK',
            customClass: {
              popup: 'poppins-font'
            }
          });

          fetch("/BM/php/submit_test.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `test_type=depression&score=${encodeURIComponent(result)}`
        })
        
    });
});
