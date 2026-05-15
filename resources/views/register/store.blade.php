<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<form action="{{ route('register.store') }}" method="post" class="needs-validation">
    @csrf
    <div class="input-group mb-3">
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               placeholder="Name" 
               name="name" 
               value="{{ old('name') }}"
               required>
        <span class="input-group-text bg-white text-muted">
            <i class="fas fa-user"></i>
        </span>
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="email" 
               class="form-control @error('email') is-invalid @enderror" 
               placeholder="Email" 
               name="email" 
               value="{{ old('email') }}"
               required>
        <span class="input-group-text bg-white text-muted">
            <i class="fas fa-envelope"></i>
        </span>
        @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="password" 
               class="form-control @error('password') is-invalid @enderror" 
               placeholder="Password" 
               name="password"
               required>
        <span class="input-group-text bg-white text-muted">
            <i class="fas fa-lock"></i>
        </span>
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="input-group mb-4">
        <input type="password" 
               class="form-control" 
               placeholder="Retype password" 
               name="password_confirmation"
               required>
        <span class="input-group-text bg-white text-muted">
            <i class="fas fa-lock"></i>
        </span>
    </div>
    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary py-2 fw-semibold shadow-sm">Register</button>
    </div>
</form>

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show row" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>