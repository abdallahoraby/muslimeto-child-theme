<div class="modal micromodal-slide" id="find-learners-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Add learner(s) to class
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">

                <div class="ajax_image_section find-users"> <div class="ajaxloader"></div> </div>

                <label for="parent_user_email">
                    Find Users:
                    <a href="#" onclick="paste();" class="paste-btn"> <i class="fas fa-paste"></i> paste email </a>
                    <input type="text" value="" id="parent_user_email" placeholder="parent user email" class="paste-here">  <i class="fas fa-search find-user"></i>
                </label>

                <span class="childs-result" style="display: block"></span>

            </main>
            <footer class="modal__footer">

            </footer>
        </div>
    </div>
</div>