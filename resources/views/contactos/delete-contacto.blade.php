<div class="modal fade" id="modal-delete-{{$contacto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('contactos.destroy', $contacto->id)}}" method="post">
            @csrf
            @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Seguro que quieres eliminar a {{$contacto->nombre." ".$contacto->apellido}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar!</button>
                <input type="submit" class="btn btn-danger btn-sm" value="Si, eliminar">
            </div>
        </div>
        </form>
    </div>
</div>
