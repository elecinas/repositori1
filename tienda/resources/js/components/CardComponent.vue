<template>
  <div id="card-component">
    <div v-if="editMode" class="card" style="width: 18rem">
      <div class="card-body">
        <label for="image">Imagen obra</label>
        <input name="image" type="text" class="form-control" v-model="card.image">
        <label for="name">Título obra</label>
        <input name="image" type="text" class="form-control" v-model="card.name">
        <label for="description">Descripción obra</label>
        <input name="description" type="text" class="form-control" v-model="card.description">

        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="#" class="btn btn-success" v-on:click="onClickUpdate()">Update</a>
          <a href="#" class="btn btn-secondary" v-on:click="onClickDelete()">Delete</a>
        </div>
      </div>
    </div>
    <div v-else class="card" style="width: 18rem">
      <img :src="card.image" class="card-img-top" alt="..." />
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
  props: {
    card: { type: Object },
  },

  data() {
    return {
      editMode: false,
    };
  },

  created() {
    console.log(this.card);
  },

  methods: {
    onClickDelete() {
      this.$emit("delete");
    },
    onClickEdit() {
      this.editMode = true;
    },
    onClickUpdate() {
      this.editMode = false;
      this.$emit('update', card);
    },
  },
};
</script>

<style scoped>
</style>