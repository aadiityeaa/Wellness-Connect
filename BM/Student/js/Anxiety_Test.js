function selectOption(question, option) {
    // Remove the 'selected' class from all circles in the same question
    document.querySelectorAll(`#circle-${question}-option1, #circle-${question}-option2, #circle-${question}-option3, #circle-${question}-option4,#circle-${question}-option5`).forEach(circle => {
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
    const form = document.querySelector("form:last-of-type"); // grabs the final form
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let total = 0;
        let count = 0;

        for (let i = 1; i <= 10; i++) {
            const selected = document.querySelector(`input[name="question${i}"]:checked`);
            if (selected) {
                total += parseInt(selected.value);
                count++;
            }
        }

        if (count !== 10) {
            alert("Please answer all questions before submitting.");
            return;
        }

        const average = total / 10;
        let result = "";

        if (average >= 1.0 && average < 2.0) {
            result = "Comfortably low anxiety";
        } else if (average >= 2.0 && average <= 2.5) {
            result = "Normal or average anxiety";
        } else if (average > 2.5 && average <= 2.9) {
            result = "A bit more than average anxiety";
        } else if (average > 2.9 && average <= 3.4) {
            result = "Moderately high anxiety";
        } else if (average > 3.4 && average <= 3.9) {
            result = "Very High anxiety";
        } else if (average > 3.9 && average <= 5.0) {
            result = "Severe anxiety";
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
            body: `test_type=anxiety&score=${encodeURIComponent(result)}`
        })
        .then(() => {
            console.log("Anxiety test result submitted");
        })
        .catch((err) => {
            console.error("Failed to submit anxiety test result:", err);
        });
    });
});
