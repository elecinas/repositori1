<template>
  <div>
    <form-component></form-component>
    <div class="d-flex flex-wrap justify-content-between flex-row bd-highlight mb-3">
      <card-component 
      v-for="card in cards" 
      :key="card.id"
      :card="card">
      </card-component>
    </div>
  </div>
</template>

<script>

import CardComponent from "./CardComponent";
import FormComponent from "./FormComponent";

export default {
  components: {
    "card-component": CardComponent,
    "form-component": FormComponent,
  },
  data() {
      return{
          cards: [{
              'id': 1,
              'image': 'https://img.culturacolectiva.com/content/2016/01/francis-bacon-medium.jpg',
              'name': 'Francis Bacon',
              'description': 'Retrato que Lucian Freud hizo sobre Francis Bacon.',
          }]
      }
  },
};

</script>

<style scoped>
</style>