module.exports = {
    apps: [{
        name:"npm",
	script:"index.js",
	instances:1,
	autorestart:true,
	watch:false,
	max_memorry_restart:"1G",
	username: "www-data"

    }]
}
