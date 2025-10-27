        const modalEl = document.getElementById('exampleModal');
        modalEl.addEventListener('shown.bs.modal', function() {

            // Start picker
            const startPicker = flatpickr('.s', {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altInput: true,
                altFormat: "F j, Y (h:i K)",
                minuteIncrement: 5,
                minDate: "today",
                allowInput: true,
                disableMobile: true,
                onChange(selectedDates) {
                    if (selectedDates[0] && endPicker) endPicker.set('minDate', selectedDates[0]);
                }
            });

            // End picker
            const endPicker = flatpickr('.e', {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altInput: true,
                altFormat: "F j, Y (h:i K)",
                minuteIncrement: 5,
                minDate: "today",
                allowInput: true,
                disableMobile: true,
                onOpen() {
                    const startDate = startPicker.selectedDates[0];
                    if (startDate) this.set('minDate', startDate);
                }
            });

        });
