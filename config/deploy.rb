
# This file is part of the RCHCapistranoBundle.
#
# (c) Robin Chalas <robin.chalas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.


# Default
set :app_path, 'app'
set :web_path, 'web'
set :var_path, 'var'
set :bin_path, "bin"

set :scm, 'git'
set :format, :pretty
set :log_level, :debug
set :stage, 'production'
set :pty, true
set :log_path, fetch(:var_path) + '/logs'
set :cache_path, fetch(:var_path) + '/cache'
set :app_config_path, fetch(:app_path) + '/config'
set :linked_files, ['app/config/parameters.yml']

# Permissions
set :file_permissions_paths, [fetch(:log_path), fetch(:cache_path)]
set :file_permissions_users, ['www-data']
set :webserver_user, 'www-data'

# Assets
set :assets_install_path, fetch(:web_path)
set :assets_install_flags, '--symlink'

# Composer
set :composer_install_flags, '--no-dev --quiet --no-interaction --optimize-autoloader'
set :composer_dump_autoload_flags, '--optimize'

# Server
set :application, 'readyup'
set :branch, 'master'
set :model_manager, 'doctrine'
set :symfony_env, 'prod'
set :use_sudo, true
set :use_set_permissions, true
set :permission_method, :chmod
set :keep_releases, 3

namespace :composer do
    # Download composer
    before :install, :download_composer
end

namespace :deploy do
    # Update database schema
    before :updated, :schemadb
    task :change_permissions do
      on roles(:all) do
        execute "chmod -R 777 #{release_path}/var/cache/"
      end
    end
end

after :deploy, "deploy:change_permissions"
