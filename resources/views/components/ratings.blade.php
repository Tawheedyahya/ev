<!-- Trigger button -->
<button type="button" class="btn btn-sm btn-outline-secondary"
        data-bs-toggle="modal"
        data-bs-target="#ratingModal">
    Rate
</button>

<!-- Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">

            <div class="modal-header">
                <h5 class="modal-title">Rate Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="ratingForm" action="{{route('overall_ratings',[$venueId,$type])}}" method="POST">
                <div class="modal-body text-center">
                    @csrf
                    <!-- Round rating buttons 1–5 -->
                    <div class="rating-options d-flex justify-content-center flex-wrap gap-2 mb-3">
                        <input type="radio" class="btn-check" name="rating" id="rate1" value="1" autocomplete="off">
                        <label class="btn btn-outline-warning rating-circle" for="rate1">1</label>

                        <input type="radio" class="btn-check" name="rating" id="rate2" value="2" autocomplete="off">
                        <label class="btn btn-outline-warning rating-circle" for="rate2">2</label>

                        <input type="radio" class="btn-check" name="rating" id="rate3" value="3" autocomplete="off">
                        <label class="btn btn-outline-warning rating-circle" for="rate3">3</label>

                        <input type="radio" class="btn-check" name="rating" id="rate4" value="4" autocomplete="off">
                        <label class="btn btn-outline-warning rating-circle" for="rate4">4</label>

                        <input type="radio" class="btn-check" name="rating" id="rate5" value="5" autocomplete="off">
                        <label class="btn btn-outline-warning rating-circle" for="rate5">5</label>
                    </div>

                    <!-- Description -->
                    <textarea class="form-control" name="description"
                              placeholder="Write your feedback..." rows="3"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Submit Rating</button>
                </div>
            </form>

        </div>
    </div>
</div>

<style>
    .rating-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        font-weight: 600;
    }

    /* Small screens: slightly smaller circles */
    @media (max-width: 576px) {
        .rating-circle {
            width: 40px;
            height: 40px;
            font-size: 0.9rem;
        }
    }
</style>
