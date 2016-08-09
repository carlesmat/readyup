
# This file is part of the RCHCapistranoBundle.
#
# (c) Robin Chalas <robin.chalas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

server '81.184.164.165',
user: 'carles',
password: 'camel33',
ssh_options: {
    user: 'carlesmat',
    keys: %w(/home/carlesmat/.ssh/id_rsa),
    forward_agent: false,
    auth_methods: %w(publickey password),
}

set :deploy_to, '/var/www/html/readyup'
set :repo_url,  'git@github.com:carlesmat/readyup.git'
