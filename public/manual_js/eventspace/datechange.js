document.addEventListener('DOMContentLoaded', function () {
    // Target all modals that might have date pickers
    document.querySelectorAll('.modal').forEach(function(modal) {
        // Allow initialization only once per modal
        modal.addEventListener('shown.bs.modal', function () {
            const modalId = modal.getAttribute('id');
            const fromInput = modal.querySelector('input[id^="starts-"]');
            const toInput = modal.querySelector('input[id^="ends-"]');

            // Skip if either picker's already been initialized
            if (!fromInput || fromInput.classList.contains('flatpickr-input')) return;

            // Flatpickr for From
            const startPicker = flatpickr(fromInput, {
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

            // Flatpickr for To
            const endPicker = flatpickr(toInput, {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altInput: true,
                altFormat: "F j, Y (h:i K)",
                minuteIncrement: 5,
                minDate: "today",
                allowInput: true,
                disableMobile: true,
                onOpen() {
                    const k = startPicker.selectedDates[0];
                    if (k) this.set('minDate', k);
                }
            });
        });
    });
});
