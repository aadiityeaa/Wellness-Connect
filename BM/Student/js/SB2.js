document.addEventListener('DOMContentLoaded', function () {

    const availableSlots = [
        "09:00 AM", "10:00 AM", "11:00 AM", "12:00 PM",
        "01:00 PM", "02:00 PM", "03:00 PM", "04:00 PM"
    ];

    let selectedDate = null;
    let selectedSlot = null;
    const bookedSlotsByDate = new Map();

    const calendarContainer = document.getElementById('calendar');
    const slotsContainer = document.getElementById('slots-container');
    const bookButton = document.getElementById('book-button');
    const datePicker = document.getElementById('date-picker');
    const prevArrow = document.getElementById('prev-arrow');
    const nextArrow = document.getElementById('next-arrow');

    // Load booking from server
    let hasServerBooking = false;
    if (typeof userBookingFromServer !== 'undefined') {
        for (const [date, slots] of Object.entries(userBookingFromServer)) {
            bookedSlotsByDate.set(date, new Set(slots));
            if (slots.length > 0) {
                hasServerBooking = true;
                selectedDate = date;
                selectedSlot = slots[0];
            }
        }
    }

    function renderCalendar() {
        const today = new Date();
        calendarContainer.innerHTML = '';

        for (let i = 0; i < 365; i++) {
            const date = new Date();
            date.setDate(today.getDate() + i);

            const isoDate = date.toISOString().split('T')[0];

            const dateItem = document.createElement('div');
            dateItem.className = 'date-item';
            dateItem.dataset.date = isoDate;

            const month = document.createElement('div');
            month.className = 'month';
            month.textContent = date.toLocaleDateString('en-US', { month: 'short' });

            const day = document.createElement('div');
            day.className = 'date';
            day.textContent = date.toLocaleDateString('en-US', { day: 'numeric' });

            dateItem.appendChild(month);
            dateItem.appendChild(day);

            if (date < today) {
                dateItem.classList.add('disabled');
            } else {
                dateItem.addEventListener('click', () => selectDate(isoDate));
            }

            if (isoDate === selectedDate) {
                dateItem.classList.add('selected');
            }

            calendarContainer.appendChild(dateItem);
        }

        scrollToSelectedDate();
    }

    function scrollToSelectedDate() {
        const selected = document.querySelector('.date-item.selected');
        if (selected) {
            calendarContainer.scrollLeft = selected.offsetLeft - calendarContainer.offsetWidth / 2 + selected.offsetWidth / 2;
        }
    }

    function renderSlots() {
        slotsContainer.innerHTML = '';
        if (!selectedDate) return;

        const bookedSlots = bookedSlotsByDate.get(selectedDate) || new Set();

        availableSlots.forEach((slot) => {
            const slotDiv = document.createElement('div');
            slotDiv.className = `slot ${bookedSlots.has(slot) ? 'booked' : selectedSlot === slot ? 'selected' : 'available'}`;
            slotDiv.textContent = slot;

            if (!bookedSlots.has(slot)) {
                slotDiv.addEventListener('click', () => selectSlot(slot));
            }

            slotsContainer.appendChild(slotDiv);
        });
    }

    function selectDate(date) {
        selectedDate = date;
        selectedSlot = null;
        renderCalendar();
        renderSlots();
    }

    function selectSlot(slot) {
        const bookedSection = document.querySelector('.cancel-button');
        if (bookedSection) {
            Swal.fire({
                icon: 'error',
                title: 'Booking Exists',
                text: 'You already have a booking. Please cancel it before booking a new slot.'
            });
            return;
        }

        selectedSlot = slot;
        renderSlots();
    }

    bookButton.addEventListener('click', () => {
        const bookedSection = document.querySelector('.cancel-button');
        if (bookedSection) {
            Swal.fire({
                icon: 'error',
                title: 'Booking Exists',
                text: 'You already have a booking. Please cancel it before booking a new slot.'
            });
            return;
        }

        if (!selectedSlot) {
            Swal.fire({
                icon: 'warning',
                title: 'No Slot Selected',
                text: 'Please select a slot before booking.'
            });
            return;
        }

        let bookedSlots = bookedSlotsByDate.get(selectedDate);
        if (!bookedSlots) {
            bookedSlots = new Set();
            bookedSlotsByDate.set(selectedDate, bookedSlots);
        }

        bookedSlots.add(selectedSlot);
        renderSlots();

        Swal.fire({
            icon: 'success',
            title: 'Booking Confirmed!',
            html: `You have booked the <strong>${selectedSlot}</strong> slot on <strong>${selectedDate}</strong>.`,
            confirmButtonColor: '#4caf50'
        });

        fetch('/BM/php/book_slot.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                date: selectedDate,
                time: selectedSlot
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                console.log("Booking saved to DB.");
                location.reload(); // Reload to update BOOKED SLOT section
            } else {
                console.error("Booking failed:", data.message);
            }
        })
        .catch(err => {
            console.error("Error sending booking:", err);
        });
    });

    datePicker.addEventListener('change', (e) => {
        selectDate(e.target.value);
    });

    prevArrow.addEventListener('click', () => {
        calendarContainer.scrollLeft -= 100;
    });

    nextArrow.addEventListener('click', () => {
        calendarContainer.scrollLeft += 100;
    });

    // ✅ Initialize with today's date
    const today = new Date().toISOString().split('T')[0];
    datePicker.value = today;
    datePicker.min = today;

    if (!selectedDate) {
        selectedDate = today;
    }

    renderCalendar();
    renderSlots();
});
