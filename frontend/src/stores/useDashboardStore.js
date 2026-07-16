import { defineStore } from "pinia";
import api from "@/helpers/api";

export const useDashboardStore = defineStore("dashboard", {

    state: () => ({

        stats: {

            total_orders: 0,
            pending_orders: 0,
            completed_orders: 0,
            cancelled_orders: 0,

        },

        loading: false,

    }),

    actions: {

        async fetchStats() {

            this.loading = true;

            try {

                const response = await api.get("dashboard/stats");

                this.stats = response.data.stats;

            } catch (error) {

                console.error("Dashboard Stats Error:", error);

            } finally {

                this.loading = false;

            }

        }

    }

});