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
    };

    const destroyCustomer = async (id) => {
        let response = await axios.delete(`/api/customers/${id}`);

    }

    return {
        customers,
        getCustomers,
        destroyCustomer,
    };
};
