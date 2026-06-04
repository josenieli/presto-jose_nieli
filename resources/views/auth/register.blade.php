<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <h1 class="display-4 fw-semibold pt-4">
                    Registrati
                </h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-5">
                <form method="POST" action="{{ route('register') }}"
                    class="bg-body-tertiary shadow-lg rounded-4 p-4 p-md-5 border">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Nome:</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name">
                    </div>

                    <div class="mb-4">
                        <label for="registerEmail" class="form-label fw-semibold">Indirizzo email</label>
                        <input type="email" class="form-control form-control-lg" id="registerEmail" name="email">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password:</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Conferma la password:</label>
                        <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>