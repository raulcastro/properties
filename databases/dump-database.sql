mysqldump -h localhost -uroot --no-data --skip-dump-date --ignore-table=db161140_2go.address --ignore-table=db161140_2go.address --ignore-table=db161140_2go.companies_photos --ignore-table=db161140_2go.crm_blog --ignore-table=db161140_2go.crm_blog_replies --ignore-table=db161140_2go.email_messages --ignore-table=db161140_2go.emails --ignore-table=db161140_2go.groups --ignore-table=db161140_2go.history_files --ignore-table=db161140_2go.history_replies --ignore-table=db161140_2go.address --ignore-table=db161140_2go.members --ignore-table=db161140_2go.names --ignore-table=db161140_2go.originally_resorts --ignore-table=db161140_2go.originally_cities --ignore-table=db161140_2go.phones --ignore-table=db161140_2go.pictures --ignore-table=db161140_2go.tasks --ignore-table=db161140_2go.transfers db161140_2go | sed "s/AUTO_INCREMENT=[0-9]*//" > current.sql