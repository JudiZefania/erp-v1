<template>
    <div>
        <h5 id="associating-form-text-with-form-controls">Nom:</h5>
        <h6>{{ personnel.nom }}</h6>
        <h5 id="associating-form-text-with-form-controls">Prenom:</h5>
        <p>{{ personnel.prenom }}</p>
        <h5 id="associating-form-text-with-form-controls">Poste:</h5>
        <p>{{ personnel.poste }}</p>
        <h5 id="associating-form-text-with-form-controls">Departement:</h5>
        <p>{{ personnel.departement }}</p>
        <router-link :to="`/personnel/${personnel.id}/edit`" class="btn btn-primary">Edit</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
data() {
    return {
        personnel: {}
    }
},
async created() {
    try {
    const response = await axios.get(`/api/personnel/${this.$route.params.id}`);
    this.personnel = response.data;
    } catch (error) {
    console.error(error);
    }
}
}
</script>