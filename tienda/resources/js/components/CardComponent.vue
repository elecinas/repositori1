<template>
  <div id="card-component">
    <div v-if="editMode" class="card" style="width: 18rem">
      <div class="card-body">
        <label for="photo">Imagen obra</label>
        <input name="photo" type="text" class="form-control" v-model="card.photo">
        <label for="name">Título obra</label>
        <input name="name" type="text" class="form-control" v-model="card.name">
        <label for="description">Descripción obra</label>
        <input name="description" type="text" class="form-control" v-model="card.description">

        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="#" class="btn btn-success" v-on:click="onClickUpdate()">Update</a>
          <a href="#" class="btn btn-secondary" v-on:click="onClickDelete()">Delete</a>
        </div>
      </div>
    </div>
    <div v-else class="card" style="width: 18rem">
      <img :src="card.photo" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">{{ card.name }}</h5>
        <p class="card-text">{{ card.description }}</p>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="#" class="btn btn-dark" v-on:click="onClickEdit()">Edit</a>
          <a href="#" class="btn btn-secondary" v-on:click="onClickDelete()">Delete</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'card-component',
  props: {
    card: { type: Object },
    shop: { type: Number || String, default: 1 },//variable botiga
  },

  data() {
    return {
      editMode: false,
    };
  },

  created() {
    console.log(this.card);
  },

  watch: {
    shop: function(value){
      console.log(value);
    }
  },

  methods: {
    onClickDelete() {
      axios.delete(`api/shops/${this.shop}/pictures/${this.card.id}`).then((response) => {
        console.log(response);
        this.$emit("delete");
      });
    },
    onClickEdit() {
      this.editMode = true;
    },
    onClickUpdate() {
      const params = {
        name: this.card.name,
        description: this.card.description,
        photo: this.card.photo,
        price: this.card.price,
        author: this.card.author,
        name_fake: this.card.name_fake,
        description_fake: this.card.description_fake,
        photo_fake: this.card.photo_fake,
        price_fake: this.card.price_fake,
        date_arrival: this.card.date_arrival,
        shop_id: this.shop
      };
      this.editMode = false;
      axios.put('api/shops/' + this.shop + '/pictures/' + this.card.id, params).then((response) => {
      const card = response.data;
      this.$emit('update', card);
      });
    },
  },
};
</script>

<style scoped>
</style>