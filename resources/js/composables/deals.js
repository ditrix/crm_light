import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useDeals () {

    const router = useRouter();

    const deals = ref([]);

    const deal = ref([]);

    const getDeals = async () => {
        let response = await axios.get('/api/deals');
        deals.value = response.data.data;
    };

    const destroyDeal = async (id) => {
        let response = await axios.delete(`/api/deals/${id}`);

    }

    const showDeal = async (id) => {
        let response = await axios.get(`/api/deals/${id}`);
        deal.value = response.data.data;
    }


    const updateDeal = async (id) => {

        await axios.put(`/api/deals/${id}`, deal.value);

        await router.push({ name: 'customers.show', params: { id: deal.value.customer_id } });

    }

      const storeDeal = async (data) => {

        let response = await axios.post(`/api/deals`, data);

        await router.push({ name: `api.show/${data.customer_id}` });
    }

    return {
        deals,
        deal,
        getDeals,
        destroyDeal,
        showDeal,
        updateDeal,
        storeDeal,

    };
};
