<template>
  <div class="stackoverflow">
    <select>
      <option value="" disabled selected>Escolha uma conta</option>
      <option v-for="account in accounts" :key="account" :value="account">{{ account.name }}</option>
    </select>
  </div>
</template>

<script>
import axios from 'axios'
const url = 'http://5af0e90b954a1000145c4c65.mockapi.io/accounts'

export default {
  name: 'Stackoverflow',
  data: () => ({
    accounts: []
  }),
  methods: {
    async getAccounts () {
      await axios.get(url)
        .then(res => {
          console.log([...res.data])
          this.accounts = [...res.data]
        })
        .catch(err => {
          console.log(err)
          // M.toast({html: 'Houve um erro ao buscar contas.', classes: 'rounded red darken-1', outDuration: 1000})
        })
    }
  },
  created () {
    this.getAccounts()
  }
}
</script>