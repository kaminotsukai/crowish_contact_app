<template>
    <div>
        <Header/>
        <v-container>
            <Loading
            :loading="loading"
            ></Loading>
            <v-row>
                <v-col cols="12" sm="6">
                <v-text-field
                    v-model="contact.first_name"
                    label="姓"
                    outlined
                ></v-text-field>
                </v-col>

                <v-col cols="12" sm="6">
                <v-text-field
                    v-model="contact.last_name"
                    label="名"
                    outlined
                ></v-text-field>
                </v-col>
            </v-row>
            <v-radio-group v-model="contact.gender" row>
                <v-radio label="男性" :value="1"></v-radio>
                <v-radio label="女性" :value="2"></v-radio>
                <v-radio label="両方" :value="3"></v-radio>
            </v-radio-group>
            <v-text-field
                v-model="contact.phone_number"
                label="電話番号(携帯)"
                single-line
                outlined
            ></v-text-field>
            <v-text-field
                v-model="contact.house_phone_number"
                label="電話番号(自宅)"
                single-line
                outlined
            ></v-text-field>
            <v-text-field
                v-model="contact.email"
                label="Eメール"
                single-line
                outlined
            ></v-text-field>
            <v-text-field
                v-model="contact.address"
                outlined
                label="住所"
            ></v-text-field>
            <v-text-field
                v-model="contact.birthday"
                label="誕生日"
                single-line
                outlined
            ></v-text-field>
            <v-textarea
                v-model="contact.memo"
                label="メモ"
                auto-grow
                outlined
                rows="3"
                row-height="25"
            ></v-textarea>
            <v-file-input accept="image/*" label="avatar"></v-file-input>           
            <div class="my-5">
                <v-btn large @click="saveContact()">登録</v-btn>
            </div>
        </v-container>
    </div>

</template>

<script>
import Header from '../../components/header'
import Loading from '../../components/loading'
import axios from 'axios'

const BASE_URL = 'http://localhost:8000'

export default {
    components: {
        Header,
        Loading
    },
    data() {
        return {
            loading: false,
            contact: {
              'first_name': '',
              'last_name': '',
              'avatar': '',
              'gender': '',
              'phone_number': '',
              'house_phone_number': '',
              'email': '',
              'address': '',
              'birthday': '',
              'memo': ''
            },
        }
    },
    computed: {
        newContact() {
            const routeParam = this.$route.params.id + ''
            return !routeParam.match(/^\d+$/)
        },
        saveContactTitle() {
            return this.newContact ? '登録' : '更新'
        },
        id () {
            return this.$route.params.id
        }
    },
    methods: {
        saveContact() {
            if (!confirm(`この内容で${this.saveContactTitle}してもよろしいでしょうか`)) return 
            this.loading = true
            const id = this.id

            if (this.newContact) {
                this.axiosSaveContact()
            } else {
                this.axiosUpdateContact(id)
            }
        },
        axiosSaveContact() {
            this.Loading = true
            let endpoint = BASE_URL + '/api/contact'
            const param = {
                'contact': this.contact
            }
            axios.post(endpoint, param)
                .then(res => {
                    console.log(res)
                    this.$router.push({name: 'contacts'})
                })
                .catch(error => {
                    this.Loading = false
                    console.warn(error)
                })
                .finally(() => {
                    this.Loading = false
                })
        },
        axiosUpdateContact(id) {
            const endPoint = BASE_URL + `/api/contact/${id}`
            const param = {
                'contact': this.contact
            }

            axios.put(endPoint, param)
                .then(res => {
                    console.log(res)
                    this.$router.push({name: 'contacts'})
                })
                .catch(error => {
                    this.loading = false
                    console.warn(error)
                })
                .finally(() => {
                    this.loading = false
                })
        },
        axiosGetContact(id) {
          this.loading = true
          const endPoint = BASE_URL + `/api/contact/${id}`
          
          axios.get(endPoint)
            .then(res => {
                console.log(res)
                this.contact = res.data
            })
            .catch(error => {
                this.loading = false
                console.warn(error)
            })
            .finally(() => {
                this.loading = false
            })
        }
    },
    created() {
      if (!this.newContact) {
          this.axiosGetContact(this.id)
    }
  } 
    
}
</script>