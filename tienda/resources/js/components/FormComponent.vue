<template>
  <form
    method="POST"
    class="formulario"
    action=""
  >
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="name">Nombre obra</label>
          <input
            name="name"
            type="text"
            class="form-control"
            id="name"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="description">Descripción obra</label>
          <input
            name="description"
            type="text"
            class="form-control"
            id="description"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="photo">Imagen obra</label>
          <input
            name="photo"
            type="text"
            class="form-control"
            id="photo"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="price">Precio obra</label>
          <input
            name="price"
            type="text"
            class="form-control"
            id="price"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="author">Autor</label>
          <input
            name="author"
            type="text"
            class="form-control"
            id="author"
            value=""
          />
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="name_fake">Nombre collar</label>
          <input
            name="name_fake"
            type="text"
            class="form-control"
            id="name_fake"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="description_fake">Descripción collar</label>
          <input
            name="description_fake"
            type="text"
            class="form-control"
            id="description_fake"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="photo_fake">Imagen collar</label>
          <input
            name="photo_fake"
            type="text"
            class="form-control"
            id="photo_fake"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="price_fake">Precio collar</label>
          <input
            name="price_fake"
            type="text"
            class="form-control"
            id="price_fake"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="dia_reserva">Día llegada</label>
          <input
            type="date"
            name="dia_reserva"
            class="form-control"
            id="dia_reserva"
            value=""
          />
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <br />
          <button type="submit" class="btn btn-dark">Submit</button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
export default {};
</script>

<style>
</style>