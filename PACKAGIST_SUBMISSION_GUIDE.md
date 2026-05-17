# 🚀 Submit to Packagist - Complete Guide

Your Alpha library is now ready for Packagist! Follow these steps to publish it.

## Prerequisites

✅ GitHub Account
✅ Packagist Account (or create one at https://packagist.org)
✅ Your code pushed to GitHub
✅ Professional README.md (✓ Done!)
✅ Proper composer.json (✓ Done!)

## Step-by-Step Guide

### 1. Prepare Your GitHub Repository

If you haven't already:

```bash
cd /home/rodrigo/code/alpha

# Initialize git if needed
git init

# Add all files
git add .

# Commit
git commit -m "Initial commit - Alpha library with tests and documentation"

# Add remote (replace YOUR_USERNAME with your GitHub username)
git remote add origin https://github.com/YOUR_USERNAME/alpha.git

# Push to GitHub
git branch -M main
git push -u origin main
```

### 2. Create a Release Tag

```bash
# Create annotated tag
git tag -a v1.1.3 -m "Release version 1.1.3"

# Push tag to GitHub
git push origin v1.1.3

# Verify tag was created
git tag -l
```

### 3. Create LICENSE File (if not exists)

Create `/home/rodrigo/code/alpha/LICENSE`:

```
MIT License

Copyright (c) 2024 Rodrigo Manara

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

### 4. Verify composer.json

Ensure your composer.json has:

```json
{
  "name": "rodrigomanara/alpha",
  "description": "A lightweight PHP library for analyzing and categorizing character types within strings.",
  "type": "library",
  "license": "MIT",
  "version": "1.1.3",
  "authors": [
    {
      "name": "Rodrigo Manara",
      "email": "me@rodrigomanara.co.uk"
    }
  ],
  "autoload": {
    "psr-4": {
      "Manara\\Alpha\\": "src/"
    }
  },
  "autoload-dev": {
    "psr-4": {
      "Manara\\Alpha\\Tests\\": "tests/"
    }
  },
  "require": {},
  "require-dev": {
    "phpunit/phpunit": "^9.5"
  },
  "scripts": {
    "test": "phpunit",
    "test:coverage": "phpunit --coverage-html coverage",
    "test:xml": "phpunit --coverage-xml coverage/coverage.xml"
  }
}
```

### 5. Submit to Packagist

#### Option A: Manual Submission (Recommended for First Time)

1. Go to https://packagist.org
2. Click **"Submit Package"** in the top navigation
3. Enter your GitHub repository URL:
   ```
   https://github.com/YOUR_USERNAME/alpha
   ```
4. Click **"Check"**
5. Review the information
6. Click **"Submit"**

#### Option B: GitHub Integration (For Automatic Updates)

1. Go to https://packagist.org/profile/
2. Click **"Show API Token"**
3. Go to your GitHub repository settings
4. Add a webhook:
   - URL: `https://packagist.org/api/github?username=YOUR_PACKAGIST_USERNAME`
   - Events: Push events
   - Active: Checked

### 6. Verify Your Package

After submission:

1. Packagist will validate your package
2. Check your email for confirmation
3. Visit: https://packagist.org/packages/rodrigomanara/alpha
4. Your package should appear within minutes

### 7. Test Installation

Once live on Packagist:

```bash
# Create a test directory
mkdir test-alpha
cd test-alpha

# Initialize composer
composer init

# Install your package
composer require rodrigomanara/alpha

# Test it works
php -r "
require 'vendor/autoload.php';
use Manara\Alpha\Alpha;
\$alpha = new Alpha();
echo \$alpha->checkVowels('hello');
"
# Should output: 2
```

## Package Information Display

Your package will show:

- **Name**: Alpha
- **Vendor**: rodrigomanara
- **Package**: alpha
- **Install Command**: `composer require rodrigomanara/alpha`
- **GitHub URL**: Link to your repository
- **Documentation**: README.md displayed
- **License**: MIT
- **Author**: Rodrigo Manara
- **Latest Version**: v1.1.3

## After Publication

### Maintaining Your Package

1. **Keep it Updated**
   - Fix bugs and release patches
   - Tag releases with semantic versioning

2. **Monitor**, Stats
   - Packagist shows download counts
   - Check for issues/bug reports

3. **Version Management**
   ```bash
   # For patch release (bug fix)
   git tag -a v1.1.4 -m "Bug fixes"
   git push origin v1.1.4

   # For minor release (new feature)
   git tag -a v1.2.0 -m "New features"
   git push origin v1.2.0

   # For major release (breaking changes)
   git tag -a v2.0.0 -m "Major rewrite"
   git push origin v2.0.0
   ```

### Semantic Versioning

Use format: MAJOR.MINOR.PATCH

- **MAJOR**: Breaking changes (v1.0 → v2.0)
- **MINOR**: New features, backward compatible (v1.1 → v1.2)
- **PATCH**: Bug fixes, backward compatible (v1.1.3 → v1.1.4)

## Troubleshooting

### Package Not Appearing

- Verify composer.json syntax: `composer validate`
- Check GitHub repository is public
- Ensure v1.1.3 tag is pushed
- Wait 5-10 minutes for Packagist to process

### Installation Issues

Run validation:
```bash
composer validate
composer require rodrigomanara/alpha:dev-main --dev
composer install --verbose
```

### Update Existing Package

1. Make changes to your code
2. Commit and push to GitHub
3. Create new release tag
4. Packagist updates automatically (if webhook set up)

## SEO Tips for Packagist

- ✅ Clear, descriptive package name
- ✅ Good description in composer.json
- ✅ Professional README with examples
- ✅ Proper keywords in description
- ✅ Active development and maintenance
- ✅ Tests included
- ✅ License specified
- ✅ Good documentation

## Resources

- Packagist: https://packagist.org/
- Composer: https://getcomposer.org/
- Semantic Versioning: https://semver.org/
- PHP Standards Recommendations: https://www.php-fig.org/

## Your Package Statistics Will Show

Once published, track:
- 📊 Total Downloads
- 📈 Downloads This Month
- ⭐ GitHub Stars
- 🔄 GitHub Watchers
- 🐛 Open Issues
- ✅ Latest Release Date

---

**Congratulations!** Your Alpha library is ready for the PHP community! 🎉

Questions? Check Packagist documentation or GitHub issues section.

