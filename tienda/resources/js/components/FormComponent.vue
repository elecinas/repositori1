<template>
  <form
    method="POST"
    class="formulario"
    action=""
    v-on:submit.prevent="newCard()"
  >
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="name">Nombre obra</label>
          <input name="name" type="text" class="form-control" v-model="name" />
        </div>

        <div class="form-group">
          <label for="description">Descripción obra</label>
          <input
            name="description"
            type="text"
            class="form-control"
            v-model="description"
          />
        </div>

        <div class="form-group">
          <label for="image">Imagen obra</label>
          <input
            name="image"
            type="text"
            class="form-control"
            v-model="image"
          />
        </div>

        <div class="form-group">
          <label for="price">Precio obra</label>
          <input
            name="price"
            type="text"
            class="form-control"
            v-model="price"
          />
        </div>

        <div class="form-group">
          <label for="author">Autor</label>
          <input
            name="author"
            type="text"
            class="form-control"
            v-model="author"
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
            v-model="name_fake"
          />
        </div>

        <div class="form-group">
          <label for="description_fake">Descripción collar</label>
          <input
            name="description_fake"
            type="text"
            class="form-control"
            v-model="description_fake"
          />
        </div>

        <div class="form-group">
          <label for="image_fake">Imagen collar</label>
          <input
            name="image_fake"
            type="text"
            class="form-control"
            v-model="image_fake"
          />
        </div>

        <div class="form-group">
          <label for="price_fake">Precio collar</label>
          <input
            name="price_fake"
            type="text"
            class="form-control"
            v-model="price_fake"
          />
        </div>

        <div class="form-group">
          <label for="date_arrival">Día llegada</label>
          <input
            type="date"
            name="date_arrival"
            class="form-control"
            v-model="date_arrival"
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
export default {
  data() {
    return {
      name: '',
      description: '',
      image: '',
      price: '',
      author: '',
      name_fake: '',
      description_fake: '',
      image_fake: '',
      price_fake: '',
      date_arrival: '',
    };
  },

  methods: {
    newCard() {
      let card = {
        id: 2,
        name: this.name,
        description: this.description,
        image: this.image,
        price: this.price,
        author: this.author,
        name_fake: this.name_fake,
        description_fake: this.description_fake,
        image_fake: this.image_fake,
        price_fake: this.price_fake,
        date_arrival: this.date_arrival,
      };
      this.$emit("new", card);
      this.name = '';
      this.description = '';
      this.image = '';
      this.price = '';
      this.author = '';
      this.name_fake = '';
      this.description_fake = '';
      this.image_fake = '';
      this.price_fake = '';
      this.date_arrival = '';
    },
  },
};
</script>

<style>
</style>