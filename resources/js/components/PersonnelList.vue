<template>
    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Poste</th>
                <th scope="col">Departement</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="personnel in personnel" :key="personnel.id">
                    <td>{{ personnel.id }}</td>
                    <td>{{ personnel.nom }}</td>
                    <td>{{ personnel.prenom }}</td>
                    <td>{{ personnel.poste }}</td>
                    <td>{{ personnel.departement }}</td>
                    <td>
                      <div class="row gap-3">
                        <router-link :to="`/personnel/${personnel.id}`" class="p-2 col border btn btn-primary">View</router-link>
                        <router-link :to="`/personnel/${personnel.id}/edit`" class="p-2 col border btn btn-success">Edit</router-link>
                        <button @click="deletePersonnel(personnel.id)" type="button" class="p-2 col border btn btn-danger">Delete</button>
                      </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      personnel: []
    }
  },
  async created() {
    try {
      const response = await axios.get('/api/personnel');
      this.personnel = response.data;
    } catch (error) {
      console.error(error);
    }
  },
  methods: {
    async deletePersonnel(id) {
      try {
        await axios.delete(`/api/personnel/${id}`);
        this.personnel = this.personnel.filter(personnel => personnel.id !== id);
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>