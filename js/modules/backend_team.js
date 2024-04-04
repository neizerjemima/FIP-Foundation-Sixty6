export function backend_team() {
    const team = Vue.createApp({
        created() {
            console.log("created lifecycle hook called");
            fetch("http://localhost/backend_fip/public/teammembers")
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    this.teammembersData = data; 
                })
                .catch(error => {
                    console.log(error);
                });
        },
    
        
        data() {
            return {
                teammembersData: [],
                error: ""
            };
        },
    
        methods: {

        }
    });
    
    team.mount("#team");
}

