<template>
  <div class="card" style="width: 18rem">
    <img
      src="{{ card.image }}"
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h5 class="card-title">{{ card.title }}</h5>
      <p class="card-text">{{ card.description }}</p>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="#" class="btn btn-dark">Edit</a
        ><a href="#" class="btn btn-secondary">Delete</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['card'],

  data() {
    return {
      card: {
        id: '',
        image: '',
        name: '',
        description: '',
      },
    };
  },
};
</script>

<style scoped>
</style>