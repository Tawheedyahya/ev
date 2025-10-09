$(document).ready(function () {
    $("#see_price").click(function () {
        let amount = $(this).data("amount"); // gets from data-amount

        if ($(this).text() === "See Price") {
            $(this).text("RM " + amount);
            $(this).addClass("add_color");
        } else {
            $(this).text("See Price");
            $(this).removeClass("add_color");
        }
    });
});
const startPicker = flatpickr("#starts_at", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    altInput: true,
    altFormat: "F j, Y (h:i K)",
    minuteIncrement: 5,
    minDate: "today",
    allowInput: true,
    disableMobile: true, // force Flatpickr UI on mobile
    onChange(selectedDates) {
        if (selectedDates[0]) endPicker.set("minDate", selectedDates[0]);
    },
});

const endPicker = flatpickr("#ends_at", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    altInput: true,
    altFormat: "F j, Y (h:i K)",
    minuteIncrement: 5,
    minDate: "today",
    allowInput: true,
    disableMobile: true,
    onOpen() {
        const s = startPicker.selectedDates[0];
        if (s) this.set("minDate", s);
    },
});

// Optional: focus first field when modal opens
document.getElementById("eventModal").addEventListener("shown.bs.modal", () => {
    document.getElementById("starts_at").focus();
});
const heartBtn = document.querySelector(".heart");
const heart_msg=document.querySelector('.heart_m');
const url=window.location.href
const parts=url.split('/').filter(Boolean)
const v_id=parts[parts.length-1]
console.log(v_id);
heartBtn.addEventListener("click", async() => {
     heart_msg.textContent=''
    if(heartBtn.dataset.id=='' || heartBtn.dataset.id==null){
        heart_msg.textContent='Need to Login'
        return
    }
    heartBtn.classList.add("active");

    const origin=window.location.origin+'/customer/heart'
    console.log(origin);
    const response=await fetch(origin,{
        method:"POST",
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify({
            venue_id:v_id,
            user_id:heartBtn.dataset.id,
            like:'yes'
        })
    })
    const data=await response.json();
    console.log(data)
});
