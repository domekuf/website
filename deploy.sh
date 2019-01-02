#!/bin/bash

pass()
{
    echo "PASS: $@"
}

fail()
{
    echo "FAIL: $@"
    exit 1
}

check()
{
    $@ &> /dev/null && pass "$@ is TRUE" || fail "$@ should be TRUE"
}

checkf()
{
    $@ &> /dev/null && fail "$@ should be FALSE" || pass "$@ is FALSE"
}


echo "Please supply domain name [ENTER]:"
read -p "http(s)://www." domain_name
#\x08 is backspace
domain_name=$(echo $domain_name | sed -E "s/\x08*([^\x08])/\1/")
#removing spaces
domain_name=$(echo $domain_name | sed -E "s/ //")
destination_folder=$(pwd | sed -E "s/[^\/]*$/$domain_name/")

echo "Please supply title [ENTER]:"
read title

echo "Please supply abbreviation KEY [ENTER]:"
read key
#removing spaces
key=$(echo $key | sed -E "s/ //")

echo "Copying project folder..."
check "cp -r $(pwd) $destination_folder"
cd $destination_folder
check "git --version"
check "git mv js/web.js js/$key.js"
check "git mv css/web.css css/$key.css"
git grep -l 'web.css' | xargs sed -i "s/web.css/$key.css/g"
git grep -l 'web.js' | xargs sed -i "s/web.js/$key.js/g"
git grep -l 'Website' | xargs sed -i "s/Website/$title/g"

echo "Site deployed:"
echo "$destination_folder"
