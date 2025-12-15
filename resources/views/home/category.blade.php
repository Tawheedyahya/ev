<div class="seg-wrapper">
    <div class="segment-tabs mb-4">
        <a href="/" class="seg-tab active">Verified Venues</a>
        <a href="javascript:void(0)" class="seg-tab" onclick="loadProfessionals(this)">Professionals</a>
        <a href="javascript:void(0)" class="seg-tab" onclick="loadProviders(this)">Service Providers</a>
    </div>
</div>


<style>
/* NEW: WRAPPER TO CENTER THE SEGMENT TABS */
.seg-wrapper {
    width: 100%;
    display: flex;
    justify-content: center; /* Centers the pill */
    margin-top: 10px;
}

/* OUTER WRAPPER (Pill Shape + Shadow) */
.segment-tabs {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    background: #ffffff;
    padding: 6px;
    border-radius: 40px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    gap: 8px;
    margin-bottom: 25px;
}

/* TABS */
.seg-tab {
    padding: 12px 28px;
    font-size: 15px;
    font-weight: 600;
    color: #374151;
    text-decoration: none;
    border-radius: 30px;
    transition: 0.25s ease;
}

/* ACTIVE */
.seg-tab.active {
    background:linear-gradient(90deg, #ff6a00, #f7b733) !important;
    color:white;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08) inset;
}

/* HOVER */
.seg-tab:hover {
    background: #eef7f9;
}

/* MOBILE */
@media (max-width: 480px) {
    .segment-tabs {
        width: 100%;
        gap: 6px;
        padding: 6px;
        justify-content: space-between;
    }

    .seg-tab {
        flex: 1;
        padding: 10px 0;
        font-size: 13px;
        text-align: center;
        border-radius: 20px;
    }
}

</style>

<script>
    function activateTab(e) {
    document.querySelectorAll(".seg-tab").forEach(tab => tab.classList.remove("active"));
    e.classList.add("active");
}

function loadVerified(e) {
    $(".fetch").load("/yahi .categoryy > *", function(_, status) {
        if (status === "success") activateTab(e);
    });
}

function loadProfessionals(e) {
    $(".fetch").load("/yahi .categoryy > *", function(_, status) {
        if (status === "success") activateTab(e);
    });
}

function loadProviders(e) {
    $(".fetch").load("/ya .categoryy > *", function(_, status) {
        if (status === "success") activateTab(e);
    });
}

</script>
