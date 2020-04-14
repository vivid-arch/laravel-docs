echo "Pushing to Github..."
git add build_production -f && git commit -m "Build for deploy" 
git subtree push --prefix build_production origin master
