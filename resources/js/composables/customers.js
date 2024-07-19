import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCustomers () {

    const router = useRouter();

    const customers = ref([]);

    const customer = ref([]);



    const getCustomers = async () => {
        let response = await axios.get('/api/customers');
        customers.value = response.data.data;
    };

    const destroyCustomer = async (id) => {
        let response = await axios.delete(`/api/customers/${id}`);

    }

    const showCustomer = async (id) => {
        let response = await axios.get(`/api/customers/${id}`);
        customer.value = response.data.data;
    }


    const updateCustomer = async (id) => {

        let response = await axios.put(`/api/customers/${id}`, customer.value);

          // перейти по роуту
        await router.push({ name: 'customers.index' });

    }

    const storeCustomer = async (data) => {

        let response = await axios.post(`/api/customers`, data);
        await router.push({ name: 'customers.index' });
    }



    return {
        customers,
        customer,
        getCustomers,
        destroyCustomer,
        showCustomer,
        updateCustomer,
        storeCustomer,
    };
};
