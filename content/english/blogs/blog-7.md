---
title: "Building ShareBin: How I Created a Pastebin Alternative for Railway's Hackathon"
date: 2025-08-10T00:00:00+00:00
image: "images/blogs/sharebin.png"
draft: false
description: "The story of building ShareBin - a modern file and text sharing platform - for Railway's 2025 Hackathon. Learn how I built and deployed a complete SaaS in one weekend."
---

# Building ShareBin: My Railway Hackathon Journey 🚀

Last week, I stumbled upon Railway's User Hackathon announcement. $1000 prize for building something cool? Challenge accepted! With just a weekend to build something meaningful, I decided to create **ShareBin** - a privacy-focused alternative to pastebin that anyone can self-host. Here's the story of how it came together.

## The Idea 💡

We've all been there - you need to quickly share a code snippet with a colleague, send a config file to a friend, or paste some logs for debugging. Sure, there are plenty of pastebins out there, but most of them are:
- Cluttered with ads
- Tracking your every move
- Requiring sign-ups for basic features
- Not giving you control over your data

I wanted something different. Something clean, fast, and self-hosted. Something that respects privacy and just works. That's how ShareBin was born.

## The Challenge ⏰

Railway's hackathon had specific requirements:
- Build something between August 6-11
- Create a deployable template
- Write detailed content about it
- Make it sophisticated enough to impress

With limited time and big ambitions, I had to be strategic. No over-engineering, no feature creep - just a solid MVP that solves a real problem.

## Building ShareBin 🛠️

### Day 1: Architecture & Setup

I started with a simple but robust architecture:
- **Frontend**: Next.js 14 (because who doesn't love React with superpowers?)
- **Backend**: Express.js (simple, fast, battle-tested)
- **Database**: PostgreSQL (Railway's native database)

The beauty of this stack? It's boring technology that just works. No fancy new frameworks to learn, no complex configurations - just solid tools that get the job done.

### Day 2: Core Features

The MVP needed to nail the basics:

```javascript
// The heart of ShareBin - generating unique IDs
function generateId() {
  return crypto.randomBytes(4).toString('hex');
}
```

Simple, right? But this little function powers the entire sharing mechanism. Each share gets a unique 8-character ID that's practically impossible to guess.

I implemented:
- **Text sharing**: Paste anything, get a link
- **File uploads**: Up to 10MB, stored directly in PostgreSQL
- **Auto-expiration**: 1 hour to never - your choice
- **View counting**: Know how many times your share was accessed

### Day 3: Making It Beautiful

A tool is only as good as its interface. I went with a modern glassmorphism design - those beautiful frosted glass effects that make everything look premium. Dark theme by default because, let's be honest, we're all developers here.

```css
/* The magic of glassmorphism */
.card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
}
```

The result? A UI that looks like it belongs in 2025, not 2005.

### Day 4: Railway Deployment

This is where Railway really shines. Deployment was literally:
1. Push to GitHub
2. Connect to Railway
3. Add environment variables
4. Done

No Docker configs, no Kubernetes yamls, no server management. Just pure developer happiness.

## The Technical Deep Dive 🔧

### Database Design

I kept it simple with a single table:

```sql
CREATE TABLE shares (
  id VARCHAR(8) PRIMARY KEY,
  content TEXT,
  filename VARCHAR(255),
  mimetype VARCHAR(100),
  file_data BYTEA,
  is_file BOOLEAN DEFAULT false,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  expires_at TIMESTAMP,
  views INTEGER DEFAULT 0
);
```

Files are stored as BYTEA directly in PostgreSQL. Is it the most scalable solution? No. Does it work perfectly for a self-hosted pastebin? Absolutely.

### Security Considerations

Security wasn't an afterthought:
- **SQL Injection Prevention**: Parameterized queries everywhere
- **File Validation**: Strict type and size checking
- **CORS Configuration**: Properly configured for the frontend
- **Input Sanitization**: Never trust user input

```javascript
// Example of parameterized query
await pool.query(
  'INSERT INTO shares (id, content, expires_at) VALUES ($1, $2, $3)',
  [id, text, expiresAt]
);
```

### Performance Optimizations

Even though it's a hackathon project, I couldn't help but optimize:
- **Automatic cleanup**: Background job removes expired shares
- **Indexed queries**: Database indexes on frequently queried fields
- **Efficient file handling**: Streaming for large files
- **Next.js optimization**: Static generation where possible

## The Result 🎉

ShareBin is now live and ready for anyone to deploy. With Railway's template system, you can have your own instance running in literally 5 minutes:

[![Deploy on Railway](https://railway.app/button.svg)](https://railway.com/deploy/Qq-IIH?referralCode=_QheAl)

### What Makes It Special?

1. **Privacy First**: Your data, your server, your rules
2. **No Bloat**: Just the features you need, nothing more
3. **Beautiful Design**: A UI that sparks joy
4. **One-Click Deploy**: Railway makes it ridiculously easy
5. **Open Source**: Fork it, modify it, make it yours

## Lessons Learned 📚

### What Went Right

- **Choosing boring technology**: Next.js + Express + PostgreSQL = no surprises
- **Starting simple**: MVP first, features later
- **Railway's platform**: Deployment was never a bottleneck
- **Time management**: Setting daily goals kept me on track

### What I'd Do Differently

- **Start with TypeScript**: Type safety would have saved debugging time
- **Add tests earlier**: Even basic tests would help with confidence
- **Better error handling**: Some edge cases need more love
- **Redis caching**: Would improve performance for popular shares

## What's Next? 🚀

ShareBin is just getting started. Here's what's on the roadmap:

- **Syntax highlighting**: Automatic language detection for code
- **Password protection**: Optional encryption for sensitive shares
- **S3 integration**: For larger file support
- **API access**: Let developers integrate ShareBin
- **Custom themes**: Because everyone loves customization

## The Open Source Journey

The code is open source and available on GitHub:
- [Frontend Repository](https://github.com/ahmed00078/sharebin-frontend)
- [Backend Repository](https://github.com/ahmed00078/sharebin-backend)

Contributions are welcome! Whether it's fixing bugs, adding features, or improving documentation - every PR helps.

## Try It Yourself!

Want to see ShareBin in action? You can:

1. **Deploy your own instance**: [One-click deploy on Railway](https://railway.com/deploy/Qq-IIH?referralCode=_QheAl)
2. **Check the source code**: Repos linked above
3. **Contribute**: Open issues, submit PRs, share ideas

## Final Thoughts 💭

Building ShareBin for Railway's hackathon was an incredible experience. In just 4 days, I went from idea to deployed product with real users. It reminded me why I love building things - the thrill of creating something useful from nothing but code and creativity.

Railway's platform made the impossible possible. No wrestling with deployments, no server configuration nightmares - just pure focus on building. If you're a developer who hasn't tried Railway yet, you're missing out.

ShareBin might not win the hackathon, but it's already a winner in my book. It solves a real problem, it's beautiful, and most importantly - it's something I'm proud to have built.

## Thank You 🙏

Big thanks to:
- **Railway** for hosting this awesome hackathon
- **The open source community** for the amazing tools
- **Everyone who tries ShareBin** - you make it worthwhile

---

*Have questions or feedback? Reach out on [ahmedsidimohammed78@gmail.com](ahmedsidimohammed78@gmail.com
) or open an issue on GitHub. Happy sharing!*

**#Railway #Hackathon #NextJS #NodeJS #PostgreSQL #OpenSource #WebDev #SaaS**