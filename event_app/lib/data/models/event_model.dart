class Event {
  final String id;
  final String title;
  final String description;
  final DateTime date;
  final String location;
  final String imageUrl;
  final double price;
  final String category;
  final String organizerName;

  Event({
    required this.id,
    required this.title,
    required this.description,
    required this.date,
    required this.location,
    required this.imageUrl,
    required this.price,
    required this.category,
    required this.organizerName,
  });

  String get formattedDate {
    // Simple formatter, in real app use intl
    return "${date.day}/${date.month}/${date.year}";
  }
}
