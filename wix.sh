echo "=======> INICIANDO SCRIPT SKELETON"
cd ..
cd ..
mkdir $1
cd $1
echo "" | cat > index.php
mkdir css
cd css
mkdir user
echo "" | cat > user/estilo.css
mkdir admin
echo "" | cat > admin/estilo.css
cd ..
mkdir img
cd img
mkdir avatars
mkdir buttons
mkdir products
mkdir pets
cd ..
mkdir js
cd js
mkdir validations
mkdir effects
echo "" | cat > validations/login.js
echo "" | cat > validations/register.js
echo "" | cat > effects/panels.js
cd ..
mkdir tpl
echo "" | cat > tpl/main.tpl
echo "" | cat > tpl/login.tpl
echo "" | cat > tpl/register.tpl
echo "" | cat > tpl/panel.tpl
echo "" | cat > tpl/profile.tpl
echo "" | cat > tpl/crud.tpl
mkdir php
echo "" | cat > php/create.php
echo "" | cat > php/read.php
echo "" | cat > php/update.php
echo "" | cat > php/delete.php
echo "" | cat > php/dbconnect.php
echo "=======> SCRIPT SKELETON TERMINADO"
