set :application, "readyup"
set :user, "carles"
set :password, "camel33"

set :domain,      "62.57.64.113"
set :deploy_to,   "/var/www/html/readyup"
set :repository,  "git@github.com:carlesmat/readyup.git"
set :scm,         :git
set :use_composer, true
set :update_vendors, false

set :copy_exclude, [".svn", ".DS_Store", ".git"]

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set :shared_files,      ["app/config/parameters.yml"] # Així no demana més els paràmetres del fitxer parameters.yml
set :shared_children,   [app_path + "/logs", web_path + "/uploads", "vendor"]

set :deploy_via, :remote_cache # Només deployar els fitxers que han canviat

default_run_options[:pty] = true

set :keep_releases,  3

set :ssh_options, { config: false, number_of_password_prompts: 0 } # Així ja no demana password per consola

set :model_manager, "doctrine"

IMPORTANT = 0
INFO = 1
DEBUG = 2
TRACE = 3
MAX_LEVEL = 3
logger.level = Logger::MAX_LEVEL

puts "----------  READYUP: Begin deployment. ---------------"

after "deploy", "deploy:cleanup" # borrem releases antigues

# Canviar permissos de les carpetes var/cache i var/logs
#task :canviar_permissos do
#  puts "----------------- Canviat permissos app/cache i app/logs ---------------"
#  run "#{try_sudo} sudo chmod -R 777 #{release_path}/var/cache #{release_path}/var/logs"
#end

#after "deploy", :canviar_permissos
