<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <h1 class="display-4 fw-semibold pt-4">
                    Accedi
                </h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-5">
                <form method="POST" action="{{ route('login') }}"
                    class="bg-body-tertiary shadow-lg rounded-4 p-4 p-md-5 border">
                    @csrf

                    <div class="mb-4">
                        <label for="loginEmail" class="form-label fw-semibold">Indirizzo email</label>
                        <input type="email" class="form-control form-control-lg" id="loginEmail"
                            name="email">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password:</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">Accedi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
