import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/material.dart';
import 'package:lucide_icons/lucide_icons.dart';
import '../../core/constants/app_colors.dart';
import '../../data/models/event_model.dart';
import '../../shared/buttons/gradient_button.dart';
import '../../shared/cards/glass_container.dart';

class EventDetailScreen extends StatelessWidget {
  final Event event;

  const EventDetailScreen({super.key, required this.event});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        children: [
          // Content
          CustomScrollView(
            slivers: [
              // App Bar with Image
              SliverAppBar(
                expandedHeight: 300,
                pinned: true,
                backgroundColor: AppColors.backgroundDark,
                flexibleSpace: FlexibleSpaceBar(
                  background: Hero(
                    tag: 'event-img-${event.id}',
                    child: CachedNetworkImage(
                      imageUrl: event.imageUrl,
                      fit: BoxFit.cover,
                    ),
                  ),
                ),
                leading: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: GlassContainer(
                    borderRadius: 12,
                    padding: EdgeInsets.zero,
                    child: IconButton(
                      icon: const Icon(Icons.arrow_back, color: Colors.white),
                      onPressed: () => Navigator.pop(context),
                    ),
                  ),
                ),
                actions: [
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: GlassContainer(
                      borderRadius: 12,
                      padding: EdgeInsets.zero,
                      child: IconButton(
                        icon: const Icon(LucideIcons.heart, color: Colors.white),
                        onPressed: () {},
                      ),
                    ),
                  ),
                ],
              ),

              // Details
              SliverToBoxAdapter(
                child: Padding(
                  padding: const EdgeInsets.all(20.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        event.title,
                        style: Theme.of(context).textTheme.headlineMedium?.copyWith(
                          fontWeight: FontWeight.bold,
                          color: Colors.white,
                        ),
                      ),
                      const SizedBox(height: 16),
                      
                      // Info Row
                      Row(
                        children: [
                          _InfoChip(icon: LucideIcons.calendar, text: event.formattedDate),
                          const SizedBox(width: 16),
                          _InfoChip(icon: LucideIcons.mapPin, text: event.location),
                        ],
                      ),
                      
                      const SizedBox(height: 24),
                      
                      // Organizer
                      Row(
                        children: [
                          const CircleAvatar(
                            backgroundColor: AppColors.cardDark,
                            child: Icon(LucideIcons.user, color: Colors.white),
                          ),
                          const SizedBox(width: 12),
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'Organizer',
                                style: TextStyle(color: AppColors.textGrey.withOpacity(0.7), fontSize: 12),
                              ),
                              Text(
                                event.organizerName,
                                style: const TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
                              ),
                            ],
                          ),
                        ],
                      ),

                      const SizedBox(height: 24),
                      
                      const Text(
                        'About Event',
                        style: TextStyle(
                          color: Colors.white,
                          fontSize: 18,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      const SizedBox(height: 8),
                      Text(
                        event.description,
                        style: const TextStyle(
                          color: AppColors.textGrey,
                          height: 1.5,
                        ),
                      ),
                      
                      const SizedBox(height: 100), // Space for bottom button
                    ],
                  ),
                ),
              ),
            ],
          ),

          // Bottom Button
          Positioned(
            bottom: 0,
            left: 0,
            right: 0,
            child: Container(
              padding: const EdgeInsets.all(20),
              decoration: BoxDecoration(
                color: AppColors.backgroundDark,
                border: Border(top: BorderSide(color: AppColors.glassBorder)),
              ),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const Text(
                        'Total Price',
                        style: TextStyle(color: AppColors.textGrey),
                      ),
                      Text(
                        '\$${event.price}',
                        style: const TextStyle(
                          color: AppColors.primaryPurple,
                          fontSize: 24,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                    ],
                  ),
                  GradientButton(
                    text: 'Book Ticket',
                    width: 160,
                    onPressed: () {
                      // Booking flow would go here
                      ScaffoldMessenger.of(context).showSnackBar(
                        const SnackBar(content: Text('Booking feature coming soon!')),
                      );
                    },
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}

class _InfoChip extends StatelessWidget {
  final IconData icon;
  final String text;

  const _InfoChip({required this.icon, required this.text});

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
      decoration: BoxDecoration(
        color: AppColors.cardDark,
        borderRadius: BorderRadius.circular(12),
        border: Border.all(color: AppColors.glassBorder),
      ),
      child: Row(
        children: [
          Icon(icon, size: 16, color: AppColors.primaryPurple),
          const SizedBox(width: 8),
          Text(
            text,
            style: const TextStyle(color: Colors.white, fontSize: 13),
          ),
        ],
      ),
    );
  }
}
