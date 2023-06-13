<template>
    <div>
      <h2 v-if="isNewPersonnel">Ajouter Personnel</h2>
      <h2 v-else>Edit Personnel</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-3">
            <label for="nom" class="form-label">Nom:</label>
            <input class="form-control" type="text" id="nom" v-model="product.nom" required />
          </div>
          <div class="mb-3">
            <label for="prenom" class="form-label">Prenom:</label>
            <textarea class="form-control" id="prenom" v-model="product.prenom" required></textarea>
          </div>
          <div class="mb-3">
            <label for="poste" class="form-label">Poste:</label>
            <input class="form-control" type="text" id="poste" v-model="product.poste" required />
          </div>
          <button type="submit" v-if="isNewProduct" class="btn btn-primary">Ajouter Personnel</button>
          <button type="submit" v-else class="btn btn-primary">Mise à jour Personnel</button>
        </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        personnel: {
          nom: '',
          prenom: '',
          poste: '',
          departement: ''
        }
      }
    },
    computed: {
      isNewPersonnel() {
        return !this.$route.path.includes('edit');
      }
    },
    async created() {
      if (!this.isNewPersonnel) {
        const response = await axios.get(`/api/personnel/${this.$route.params.id}`);
        this.personnel = response.data;
      }
    },
    methods: {
      async submitForm() {
        try {
          if (this.isNewPersonnel) {
            await axios.post('/api/personnel', this.personnel);
          } else {
            await axios.put(`/api/personnel/${this.$route.params.id}`, this.personnel);
          }
          this.$router.push('/');
        } catch (error) {
          console.error(error);
        }
      }
    }
  }
  </script>