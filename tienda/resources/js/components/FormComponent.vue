<template>
<div id='form-component'>
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
          <label for="photo">Imagen obra</label>
          <input
            name="photo"
            type="text"
            class="form-control"
            v-model="photo"
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
          <label for="photo_fake">Imagen collar</label>
          <input
            name="photo_fake"
            type="text"
            class="form-control"
            v-model="photo_fake"
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
</div>
</template>

<script>
export default {
  name: 'form-component',
  props: {
    shop: { type: Number || String, default: 1 },//variable botiga
  },

  data() {
    return {
      name: '',
      description: '',
      photo: '',
      price: '',
      author: '',
      name_fake: '',
      description_fake: '',
      photo_fake: '',
      price_fake: '',
      date_arrival: '',
    };
  },

  watch: {
    shop: function(value){
      console.log(value);
    }
  },

  methods: {
    newCard() {
      const params = {
        name: this.name,
        description: this.description,
        photo: this.photo,
        price: this.price,
        author: this.author,
        name_fake: this.name_fake,
        description_fake: this.description_fake,
        photo_fake: this.photo_fake,
        price_fake: this.price_fake,
        date_arrival: this.date_arrival,
        shop_id: this.shop
      };

      this.name = '';
      this.description = '';
      this.photo = '';
      this.price = '';
      this.author = '';
      this.name_fake = '';
      this.description_fake = '';
      this.photo_fake = '';
      this.price_fake = '';
      this.date_arrival = '';

      axios.post('api/shops/' + this.shop + '/pictures', params).then((response)=>{
        const card = response.data;
        this.$emit("new", card);
      });
    },
  },
};
</script>

<style>
</style>