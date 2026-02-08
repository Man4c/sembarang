import '../models/event_model.dart';

final List<Event> mockEvents = [
  Event(
    id: '1',
    title: 'Neon Nights Music Festival',
    description: 'Experience the ultimate electronic music festival with top DJs from around the world. Neon lights, bass drops, and an unforgettable night.',
    date: DateTime.now().add(const Duration(days: 5)),
    location: 'Cyber Arena, Tokyo',
    imageUrl: 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?q=80&w=2070&auto=format&fit=crop',
    price: 150.00,
    category: 'Music',
    organizerName: 'ElectroBeats Inc.',
  ),
  Event(
    id: '2',
    title: 'Future Tech Conference 2024',
    description: 'Join industry leaders to discuss AI, Blockchain, and the future of humanity. Networking, workshops, and keynote speeches.',
    date: DateTime.now().add(const Duration(days: 12)),
    location: 'Silicon Valley Convention Center',
    imageUrl: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=2070&auto=format&fit=crop',
    price: 299.99,
    category: 'Tech',
    organizerName: 'TechWorld',
  ),
  Event(
    id: '3',
    title: 'Modern Art Gallery Opening',
    description: 'A showcase of contemporary abstract art from emerging artists. Wine and cheese reception included.',
    date: DateTime.now().add(const Duration(days: 2)),
    location: 'The Cube Gallery, NY',
    imageUrl: 'https://images.unsplash.com/photo-1518998053901-5348d3969105?q=80&w=1974&auto=format&fit=crop',
    price: 50.00,
    category: 'Art',
    organizerName: 'Art Collective',
  ),
  Event(
    id: '4',
    title: 'Indie Rock Concert',
    description: 'An intimate night with the best indie rock bands in the city.',
    date: DateTime.now().add(const Duration(days: 7)),
    location: 'The Basement, London',
    imageUrl: 'https://images.unsplash.com/photo-1501612766622-27883714c281?q=80&w=1974&auto=format&fit=crop',
    price: 35.00,
    category: 'Music',
    organizerName: 'IndieRecords',
  ),
];

final List<String> categories = ['All', 'Music', 'Tech', 'Art', 'Sports', 'Food'];
