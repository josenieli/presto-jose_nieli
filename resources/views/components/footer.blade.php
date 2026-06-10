<footer class="bg-body-tertiary border-top py-5">
    <div class="container">
        <div class="row gy-4 align-items-center text-center text-md-start">
            <div class="col-12 col-md-4">
                <p class="mb-0 text-body-secondary">{{ __('ui.footerCopyright') }}</p>
            </div>

            <div class="col-12 col-md-3">
                <div class="d-flex flex-column flex-md-row justify-content-center gap-2 gap-md-3">
                    <a href="#" class="text-decoration-none text-body-secondary">{{ __('ui.home') }}</a>
                    <a href="#" class="text-decoration-none text-body-secondary">{{ __('ui.aboutMe') }}</a>
                    <a href="#" class="text-decoration-none text-body-secondary">{{ __('ui.contacts') }}</a>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="p-3 rounded-4 border bg-body shadow-sm text-center">
                    <h5 class="mb-2">{{ __('ui.wantBecomeRevisor') }}</h5>
                    <p class="mb-3 text-body-secondary">{{ __('ui.becomeRevisorText') }}</p>
                    <a href="{{ route('become.revisor') }}" class="btn btn-success px-4">
                        {{ __('ui.becomeRevisor') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>