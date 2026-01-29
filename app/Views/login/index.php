<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-lg-5">
    <div class="card shadow-sm app-card">
      <div class="card-body p-4">
        <div class="text-center mb-4">
          <span class="icon-wrap mb-3">
            <i class="bi bi-shield-lock"></i>
          </span>
          <h4 class="fw-bold mb-1">Inicio de sesión</h4>
          <p class="text-muted mb-0">Accede con tu usuario al sistema.</p>
        </div>

        <form method="post" action="index.php?route=login">
          <div class="mb-3">
            <label class="form-label">Usuario</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person"></i></span>
              <input class="form-control" type="text" name="username" placeholder="Usuario" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-key"></i></span>
              <input class="form-control" type="password" name="password" placeholder="**********" required>
            </div>
          </div>
          <button class="btn btn-primary w-100 app-action" type="button">
            <i class="bi bi-box-arrow-in-right me-2"></i>Ingresar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>