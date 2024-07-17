import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCustomers () {

    const router = useRouter();

    const customers = ref([]);

    const errors = ref('');

    const getCustomers = async () => {
        let response = await axios.get('/api/customers');
        customers.value = response.data.data;
    }
    return {
        customers,
        getCustomers
    };
};
