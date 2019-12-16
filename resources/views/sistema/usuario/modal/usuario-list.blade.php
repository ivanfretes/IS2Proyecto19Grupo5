
<!-- Modal -->
<div class="modal fade" id="UsuarioListModal" tabindex="-1" role="dialog" aria-labelledby="UsuarioListModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UsuarioListModalLabel">
          Listado de Usuarios
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Busqueda de usuario</label>

        <input type="text" name="q" 
          class="form-control"
          id="usuario-box-modal">
        <div></div>
        <ul class="list-group" id="usuario-listado-modal"></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cerrar
        </button>
        <button type="button" class="btn btn-primary">
          Asignar
        </button>
      </div>
    </div>
  </div>
</div>
