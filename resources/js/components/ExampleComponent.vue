<template>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Employee List</div>
            <div class="card-body">
              <label for="search">Search : </label>
              <input type="text" v-model="searchQuery" id="search" @input="fetchData" placeholder="Search name/department/designation"/>
              <div v-if="loading">Loading...</div>
              <div v-if="!loading && data.length === 0">No results found</div>
              <div class="employee" v-if="!loading&& data.length > 0">
                <div class="emp-data" v-for="item in this.data" :key="item.id">
                  <ul>
                      <li>
                        {{ item.employee_name }}<br>
                        {{ item.designation_name }}<br>
                        {{ item.department_name }}
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        data() {
    return {
      searchQuery: '',
      data: [],
      loading: false,
    };
  },
  computed: {
    filteredData() {
      if (this.searchQuery) {
        return this.data.filter(item =>
          item.employee_name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          item.designation_name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          item.department_name.toLowerCase().includes(this.searchQuery.toLowerCase())
        );
      }
      return this.data;
    },
  },
  methods: {
    fetchData() {
      this.loading = true;
      axios.get('/getEmployeeList', {
        params: { search: this.searchQuery },
      })
      .then(response => {
        this.data = response.data;
        this.loading = false;
      })
      .catch(() => {
        this.loading = false;
      });
    },
  },
    mounted() {
        this.fetchData();
    }
    }
</script>
<style scoped>

label {
    font-weight: bold;
    margin: 0;
}

input {
  width: 100%;
  max-width: 600px;
  margin-bottom: 1rem;
  padding: 0.5rem;
  font-size: 1rem;
}


.employee {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.emp-data {
    flex: 0 0 calc(50% - 16px);
    box-sizing: border-box;
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
    background-color: #f9f9f9;
}

ul {
    padding: 0;
    margin: 0;
    list-style-type: none;
}

li {
    margin: 0;
}

</style>
