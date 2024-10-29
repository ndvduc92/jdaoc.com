#!/bin/bash
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/entli
git add .
git commit -m "-----"
git push origin main