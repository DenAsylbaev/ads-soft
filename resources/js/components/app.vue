<template>
  <div class="form">

    <div v-for="(item, index) in keyValue" :key="index" class="form-row">
      <input v-model="item.key" class="input-key" placeholder="Key">
      <input v-model="item.value" class="input-value" placeholder="Value">
    </div>

    <button @click="search" class="submit-button">Search</button>

    <div v-if="loading" class="loading">Loading...</div>

    <div v-if="dataLoaded">
      <table v-if="searchResults.length > 0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Access</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(result, index) in searchResults" :key="index">
                <td>{{ result.id }}</td>
                <td>{{ result.data }}</td>
                <td>{{ result.access }}</td>
            </tr>
        </tbody>
    </table>
      <div v-else>No results found</div>
    </div>


  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      keyValue: [
        { key: '', value: '' }, 
        { key: '', value: '' }, 
        { key: '', value: '' }
      ],
      searchResults: [],
      loading: false,
      dataLoaded: false
    };
  },
  methods: {

    editData() {
      return this.keyValue.map(item => {
        const obj = {};
        obj[item.key] = item.value;
        return obj;
      });
    },

    search() {
      this.loading = true;
      this.dataLoaded = false;

        window.axios.post('/api/records/search', {
          data: this.editData()
        })
        .then(result => {
          this.searchResults = result.data;
          // console.log(this.searchResults);
          this.dataLoaded = true
        })

      this.loading = false;
    }
  }
};
</script>

<style scoped>
.form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-row {
  margin-bottom: 10px;
}

.input-key,
.input-value {
  width: 45%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.submit-button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.loading {
  margin-top: 10px;
}

table {
    margin-top: 15px;
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

</style>