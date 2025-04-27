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

        for (let i = 1; i <= 7; i++) {
            const selected = document.querySelector(`input[name="question${i}"]:checked`);
            if (selected) {
                total += parseInt(selected.value);
                answered++;
            }
        }

        if (answered !== 7) {
            alert("Please answer all questions before submitting.");
            return;
        }

        let result = "";

        if (total <= 7) {
            result = "Normal stress";
        } else if (total <= 9) {
            result = "Mild stress";
        } else if (total <= 12) {
            result = "Moderate stress";
        } else if (total <= 16) {
            result = "Severe";
        } else {
            result = "Extremely Severe stress";
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

          console.log("Submitting test result:", result);

          fetch("/BM/php/submit_test.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `test_type=stress&score=${encodeURIComponent(result)}`
        })
        .then(() => {
            console.log("Stress test result submitted");
        })
        .catch((err) => {
            console.error("Failed to submit stress test result:", err);
        });                
    });
});
